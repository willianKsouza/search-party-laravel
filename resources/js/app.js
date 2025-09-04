import Alpine from 'alpinejs'
import './laravel-echo/echo';
import post from './alpine/post'
import menuMobile from './alpine/menuMobile';
import filters from './alpine/filters';
import notifications from './alpine/notifications';
import chat from './alpine/chat';

Alpine.data('post', post)
Alpine.data('menuMobile', menuMobile)
Alpine.data('notifications', notifications)
Alpine.data('filters', filters)
Alpine.data('chat', chat)
window.Alpine = Alpine

Alpine.start()
