import axios from "../plugins/axios";
export default () => ({
    post: {
        data: {
            title: "",
            body: "",
            categories: [],
            categories_id: [],
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
            console.log(post);
            this.chatListener(post.id);
            this.chatPresenseListenner(post.id);
            this.post.data.title = post.title;
            this.post.data.body = post.body;
            this.post.postId = post.id;
            this.post.data.messages = post.messages;
            this.post.data.participants = post.participants;
            this.post.data.categories = post.categories;
        } catch (error) {
            this.post.warning =
                "Ocorreu um erro ao carregar o post, tente novamente";
        } finally {
            this.post.showPostModal = true;
        }
    },
    async closePostModal() {
        try {
            this.post.showPostModal = false;
        } catch (error) {
            alert("ocorreu um erro atualize a pagina");
        } finally {
            this.chatSetStatusUser("offline");
            Echo.leave(`chat.post.${this.post.postId}`);
        }
    },
    toggleNewPostModal() {
        this.post.showNewPostModal = !this.post.showNewPostModal;
    },
    async createPost() {
        try {
            await axios.post("/user/post", {
                title: this.post.data.title,
                body: this.post.data.body,
                categories: this.post.data.categories_id,
            });

            console.log(this.post.data);

            location.reload();
        } catch (error) {
            console.log(error);

            const errors = error.response.data.errors;
            this.post.errors = {};
            for (const field in errors) {
                this.post.errors[field] = errors[field][0];
            }
            console.log(this.post.errors);
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
    async exitChatPost(id) {
        try {
            await axios.post("/user/post/" + id);
        } catch (error) {
            console.log(error);
        }
    },
    async sendMessage(userId) {
        if (
            this.post.data.message.trim() === "" ||
            this.post.data.message === null
        ) {
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
                const messageExists = this.post.data.messages.some(
                    (msg) => msg.id === e.message.id,
                );
                if (!messageExists) {
                    this.post.data.messages.push(e.message);
                }
            },
        );
    },
    chatPresenseListenner(postId) {
        window.Echo.join(`chat.post.${postId}`)
            .here((user) => {
                console.log("here", user);
                this.chatSetStatusUser("online");
            })
            .joining((user) => {
                console.log("joining", user);
            })
            .leaving((user) => {
                //
            })
            .error((error) => {
                console.error("error fun", error);
            });
    },

    async chatSetStatusUser(state) {
        await axios.post(`/chat/set/status/${state}/${this.post.postId}`);
    },

    formatDate(date) {
        if (!date) return "";
        let d = new Date(date);

        return new Intl.DateTimeFormat("pt-BR", {
            day: "2-digit",
            month: "2-digit",
            year: "numeric",
            hour: "2-digit",
            minute: "2-digit",
        })
            .format(d)
            .replace(",", " às");
    },
});
