import axios from "../plugins/axios";
export default () => ({
    post: {
        data: {
            title: "",
            body: "",
            categories: [],
            message: "",
            participants: [],
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
            this.chatListener(post[0].id);
            this.chatPresenseListenner(post[0].id);
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
        let messageId;
        try {
            const { data } = await axios.post(
                "/message/send/" + this.post.postId,
                {
                    message: this.post.data.message,
                    post_id: this.post.postId,
                },
            );
            messageId = data.id;
        } catch (error) {
            const errors = error.response.data.errors;
            this.post.errors = {};
            for (const field in errors) {
                this.post.errors[field] = errors[field][0];
            }
        } finally {
            if (messageId) {
                this.post.data.messages.push({
                    id: messageId,
                    message: this.post.data.message,
                    user_id: userId,
                    created_at: new Date()
                        .toISOString()
                        .replace("T", " ")
                        .replace("Z", ""),
                });
            }
            this.post.data.message = "";
        }
    },
    chatListener(postId) {
        window.Echo.private(`chat.post.${postId}`).listen(
            ".user.message.sent",
            (e) => {
                console.log(e);
                const messageExists = this.post.data.messages.some(msg => msg.id === e.message.id)
                if (!messageExists) {
                    this.post.data.messages.push(e.message);
                }
            },
        );
    },
    chatPresenseListenner(postId) {
        window.Echo.join(`chat.post.${postId}`)
            .here(async (users) => {
                //  await axios.post();
            })
            .joining((user) => {
                console.log("joining func", user);
            })
            .leaving((user) => {
                console.log("leaving fun", user);
            })
            .error((error) => {
                console.error("error fun", error);
            });
    },
    notificationListener(userId) {
        console.log();

        window.Echo.private(`user.notify.${userId}`).listen(
            ".user.notify",
            (e) => {
                console.log("Recebido:", e);
            },
        );
    },
});
