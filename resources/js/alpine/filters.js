export default () => ({
    searchParams: new URLSearchParams(window.location.search),
    search: "",
    init() {
        this.search = this.searchParams.get("search");
    },
    searchByTitle() {
        if (this.search === "") {
            this.searchParams.delete("search");

            const newUrl = `${window.location.pathname}?${this.searchParams.toString()}`;

            window.history.replaceState({}, "", newUrl);

            window.location.href = newUrl;

            return;
        }

        this.searchParams.set("search", this.search);

        const newUrl = `${window.location.pathname}?${this.searchParams.toString()}`;

        window.history.replaceState({}, "", newUrl);

        window.location.href = newUrl;
    },
    categoryFilter(slug) {
        if (!slug) {
            return;
        }
        this.searchParams = new URLSearchParams(window.location.search);

        const newParams = this.searchParams.get("category") ?? [];

        if (Array.isArray(newParams)) {
            newParams.push(slug);

            this.searchParams.set("category", `${slug}`);

            const newUrl = `${window.location.pathname}?${this.searchParams.toString()}`;

            window.history.replaceState({}, "", newUrl);

            window.location.reload();
        }
        const stringParams = this.searchParams.getAll("category").toString();

        const isExistsValue = stringParams.split(",").includes(slug);

        if (isExistsValue) {
            
            return;
        }

        this.searchParams.set("category", `${stringParams},${slug}`);

        const newUrl = `${window.location.pathname}?${this.searchParams.toString()}`;

        window.history.replaceState({}, "", newUrl);

        window.location.reload();
    },
    clearAllFilters() {
        const newUrl = `${window.location.pathname}`;

        window.history.replaceState({}, "", newUrl);

        window.location.reload();
    },
});
