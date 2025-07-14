import Alpine from 'alpinejs'
import post from './alpine/post'
// import chat from './alpine/chat';
import menuMobile from './alpine/menuMobile';
import './laravel-echo/echo';
import filters from './alpine/filters';

Alpine.data('post', post)
// Alpine.data('chat', chat)
Alpine.data('menuMobile', menuMobile)

Alpine.data('filters', filters)
window.Alpine = Alpine

Alpine.start()
