export default () => ({
    notifications: [],
    showNotifications: false,
    toggleMenu() {
        this.showNotifications = !this.showNotifications;
    },
    notificationListener(userId) {
        window.Echo.private(`App.Models.User.${userId}`).notification(
            (notification) => {
                this.notifications.push({
                    post_title: notification.post_title,
                    id: notification.id,
                });
                console.log("notification", this.notifications);
            },
        );
    },
});
