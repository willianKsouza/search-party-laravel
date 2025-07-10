import Alpine from 'alpinejs'
import post from './alpine/post'
import chat from './alpine/chat';
import menuMobile from './alpine/menuMobile';
import './laravel-echo/echo';


Alpine.data('post', post)
Alpine.data('chat', chat)
Alpine.data('menuMobile', menuMobile)
window.Alpine = Alpine

Alpine.start()
