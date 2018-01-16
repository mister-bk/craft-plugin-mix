<?php
/**
 * Craft Mix
 *
 * @author    mister bk! GmbH
 * @copyright Copyright (c) 2017-2018 mister bk! GmbH
 * @link      https://www.mister-bk.de/
 */

namespace misterbk\mix;

use misterbk\mix\models\Settings;
use misterbk\mix\twigextensions\MixTwigExtension;
use misterbk\mix\variables\MixVariable;

use Craft;
use craft\base\Plugin;

class Mix extends Plugin
{
    /**
     * @var Mix
     */
    public static $plugin;


    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Craft::$app->view->twig->addExtension(new MixTwigExtension());

        Craft::info('Mix plugin loaded', __METHOD__);
    }

    /**
     * @inheritdoc
     */
    public function defineTemplateComponent()
    {
        return MixVariable::class;
    }

    /**
     * @inheritdoc
     */
    protected function createSettingsModel()
    {
        return new Settings();
    }

    /**
     * @inheritdoc
     */
    protected function settingsHtml(): string
    {
        return Craft::$app->view->renderTemplate(
            'mix/settings',
            ['settings' => $this->getSettings()]
        );
    }
}
