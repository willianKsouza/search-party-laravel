import axios from "axios";

let csrf = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");

axios.defaults.baseURL = import.meta.env.APP_URL;
axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
axios.defaults.headers.common["X-CSRF-TOKEN"] = csrf;



axios.interceptors.response.use(
    function (response) {
        return response;
    },
    function (error) {
        return Promise.reject(error);
    }
);

window.axios = axios;

export default axios;
