export default () => ({
    searchParams: new URLSearchParams(window.location.search),
    search: "",
    init() {
        this.search = this.searchParams.get("search");
    },
    searchByTitle() {
        if (this.search === "") {
            this.searchParams.delete("search");

            this.updateOrClearUrl(this.searchParams.toString());

            return;
        }

        this.searchParams.set("search", this.search);

        this.updateOrClearUrl(this.searchParams.toString());
    },
    categoryFilter(slug) {
        if (!slug) {
            return;
        }
        this.searchParams = new URLSearchParams(window.location.search);

        const newParams = this.searchParams.get("category")?.split(",") ?? [];

        if (!newParams.includes(slug)) {
            newParams.push(slug);

            this.searchParams.set("category", newParams.toString());

            this.updateOrClearUrl(this.searchParams.toString());
        }
    },
    updateOrClearUrl(query) {
        const newUrl = `${window.location.pathname}?${query}`;

        window.location.href = newUrl;
    },
});
