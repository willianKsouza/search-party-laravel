import Alpine from 'alpinejs'
import post from './alpine/post'
import './laravel-echo/echo';


Alpine.data('post', post)
window.Alpine = Alpine

Alpine.start()