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
use craft\web\twig\variables\CraftVariable;

use yii\base\Event;

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

        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function (Event $event) {
                /** @var CraftVariable $variable */
                $variable = $event->sender;
                $variable->set('mix', MixVariable::class);
            }
        );

        Craft::$app->view->registerTwigExtension(new MixTwigExtension());

        Craft::info('Mix plugin loaded', __METHOD__);
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
