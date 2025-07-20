import Alpine from 'alpinejs'
import './laravel-echo/echo';
import post from './alpine/post'
import menuMobile from './alpine/menuMobile';
import filters from './alpine/filters';
import notifications from './alpine/notifications';

Alpine.data('post', post)
Alpine.data('menuMobile', menuMobile)
Alpine.data('notifications', notifications)
Alpine.data('filters', filters)
window.Alpine = Alpine

Alpine.start()
