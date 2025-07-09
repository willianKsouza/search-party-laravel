import Alpine from 'alpinejs'
import post from './alpine/post'
import chat from './alpine/chat';
import './laravel-echo/echo';


Alpine.data('post', post)
Alpine.data('chat', chat)
window.Alpine = Alpine

Alpine.start()
