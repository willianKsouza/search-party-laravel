import axios from "../plugins/axios";
export default () => ({
    post: {
        data: {
            title: "",
            body: "",
            categories: [],
        },
        errors: {
            title: "",
            body: "",
            categories: [],
        },
        showNewPostModal: false,
        showPostModal: false,
    },
    togglePostModal() {
        this.post.showPostModal = !this.post.showPostModal;
    },
    toggleNewPostModal() {
        this.post.showNewPostModal = !this.post.showNewPostModal;
    },
    async createPost() {
        try {
            await axios.post("/user/post", this.post.data);
            location.reload();
        } catch (error) {
            const errors = error.response.data.errors;
            this.post.errors = {};
            for (const field in errors) {
                this.post.errors[field] = errors[field][0];
            }
        }
    },
});
