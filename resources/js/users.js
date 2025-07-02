import axios from "./plugins/axios";
export default () => ({
    form: {
        data: {
            user_name: null,
            email: null,
            password: null,
            password_confirmation: null,
            bio: null,
            remember: false,
        },
        errors: {
            user_name: null,
            email: null,
            password: null,
            password_confirmation: null,
            bio: null,
        },
        token:'',
        warning: "",
        loading: false,
        showModal: false,
    },
    setUser(user) {
        this.form.data = user;
    },
    async create() {
        this.form.loading = true;
        try {
            const { data } = await axios.post("/register", this.form.data);
            return (window.location.href = data.redirect);
        } catch (error) {
            const errors = error.response.data.errors;
            this.form.errors = {};
            for (const field in errors) {
                this.form.errors[field] = errors[field][0];
            }
        } finally {
            this.form.loading = false;
        }
    },
    async update(id) {
        this.form.loading = true;
        try {
            const data = await axios.put("/user/update/" + id, this.form.data);
            if (data.status === 204) {
                this.form.warning = "Dados atualizados com sucesso";
            }
        } catch (error) {
            const errors = error.response.data.errors;
            this.form.errors = {};
            for (const field in errors) {
                this.form.errors[field] = errors[field][0];
            }
        } finally {
            setTimeout(() => {
                this.form.warning = "";
            }, 5000);
            this.form.loading = false;
        }
    },

    async deleteUser(id) {
        console.log("olaaa");

        this.form.loading = true;
        try {
            const { data } = await axios.delete("/users/" + id);
            window.location.href = data.redirect;
        } catch (error) {
            const errors = error.response.data.errors;
            this.form.errors = {};
            for (const field in errors) {
                this.form.errors[field] = errors[field][0];
            }
        } finally {
            this.form.loading = false;
        }
    },
    async login() {
        this.form.loading = true;
        const formLogin = {
            email: this.form.data.email,
            password: this.form.data.password,
            remember: this.form.data.remember,
        };
        try {
            const { data } = await axios.post("/login", formLogin);
            window.location.href = data.redirect;
        } catch (error) {
            if (error.response.status === 401) {
                this.form.warning = "E-mail ou senha inválidos";
            }
            const errors = error.response.data.errors;
            this.form.errors = {};
            for (const field in errors) {
                this.form.errors[field] = errors[field][0];
            }
        } finally {
            setTimeout(() => {
                this.form.warning = "";
            }, 5000);
            this.form.loading = false;
        }
    },
    async sendForgotPassword(){
        this.form.loading = true;
        console.log(email);
        try {
            const { data } = await axios.post("/forgot-password", { 
                email: this.form.data.email,
                token: this.form.token

            });
            console.log(data);
            
        } catch (error) {
            console.log(error);
            const errors = error.response.data.errors;
            this.form.errors = {};
            for (const field in errors) {
                this.form.errors[field] = errors[field][0];
            }
        } finally {
            setTimeout(() => {
                this.form.warning = "";
            }, 5000);
            this.form.loading = false;
        }
    },


});
