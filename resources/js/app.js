import Alpine from 'alpinejs'
import users from './users'

Alpine.data('users', users)
window.Alpine = Alpine
 
Alpine.start()
