// import axios from "../plugins/axios";
export default () => ({
    post: {
        showModal: false,
    },
    openModal(){
        this.post.showModal = true
    },
    closeModal(){
        this.post.showModal = false
    }
});
