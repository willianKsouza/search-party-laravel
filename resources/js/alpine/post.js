import axios from "../plugins/axios";
export default () => ({
    post: {
        data: {
            title: "",
            body: "",
            categories: [],
            message: "",
            participants:[],
            messages: [],
        },
        errors: {
            title: "",
            body: "",
            message: "",
            categories: [],
        },
        postId: "",
        warning: "",
        showNewPostModal: false,
        showPostModal: false,
    },
    async openPostModal(id) {
        try {
            const { post } = await this.getPostInfo(id);
            console.log(post);
            await this.chatListener(post[0].id);
            this.post.data.title = post[0].title;
            this.post.data.body = post[0].body;
            this.post.postId = post[0].id;
            this.post.data.messages = post[0].messages;
            this.post.data.participants = post[0].participants;
            this.post.data.categories = post[0].categories;
        } catch (error) {
            this.post.warning =
                "Ocorreu um erro ao carregar o post, tente novamente";
        } finally {
            this.post.showPostModal = true;
        }
    },
    closePostModal() {
        this.post.showPostModal = false;
    },
    toggleNewPostModal() {
        this.post.showNewPostModal = !this.post.showNewPostModal;
    },
    async createPost() {
        try {
            await axios.post("/user/post", this.post.data);
            console.log(this.post.data);
            
            location.reload();
        } catch (error) {
            const errors = error.response.data.errors;
            this.post.errors = {};
            for (const field in errors) {
                this.post.errors[field] = errors[field][0];
            }
        }
    },
    async getPostInfo(id) {
        try {
            const { data } = await axios.get("/user/post/" + id);
            return data;
        } catch (error) {
            const errors = error.response.data.errors;
            this.post.errors = {};
            for (const field in errors) {
                this.post.errors[field] = errors[field][0];
            }
        }
    },
    async sendMessage(userId) {
        if (this.post.data.message.trim() === "") {
            return;
        }
        const id = this.post.postId;
        try {
            await axios.post("/message/send/" + id, {
                message: this.post.data.message,
                post_id: this.post.postId,
            });
            this.post.data.participants.push()
        } catch (error) {
            const errors = error.response.data.errors;
            this.post.errors = {};
            for (const field in errors) {
                this.post.errors[field] = errors[field][0];
            }
        } finally {
            this.post.data.messages.push({
                id: Date.now() + Math.random(),
                message: this.post.data.message,
                user_id: userId,
                created_at: new Date()
                    .toISOString()
                    .replace("T", " ")
                    .replace("Z", ""),
            });

            this.post.data.message = "";
        }
    },
    async chatListener(postId) {
        await Echo.private(`chat.post.${postId}`).listen(
            ".user.message.sent",
            (e) => {
                this.post.data.messages.push(e.message);
            },
        );
    },
});
