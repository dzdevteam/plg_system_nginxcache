<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  System.jds
 *
 * @copyright   Copyright (C) 2015 DZ Creative Studio. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

/**
 * Joomla! JDS Plugin.
 *
 * @package     Joomla.Plugin
 * @subpackage  System.JDS
 * @since       1.5
 */
class PlgSystemNginxCache extends JPlugin
{
    /**
     * After app init
     *
     * @return  void
     *
     * @since   3.0
     */
    public function onAfterInitialise()
    {
        $app = JFactory::getApplication();
        $user = JFactory::getUser();
        if ($app->isAdmin() || !$user->guest) {
            $app->allowCache(false);
            $app->input->cookie->set('JSESSION', true);
        } else {
            $app->allowCache(true);
            $app->input->cookie->set('JSESSION', NULL, time() - 1);
        }
    }
}
