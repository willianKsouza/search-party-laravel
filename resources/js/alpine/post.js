// import axios from "../plugins/axios";
export default () => ({
    post: {
        showNewPostModal: false,
        showPostModal: false,
    },
    togglePostModal() {
        this.post.showPostModal = !this.post.showPostModal;
    },
    toggleNewPostModal() {
        this.post.showNewPostModal = !this.post.showNewPostModal;
    },
});
