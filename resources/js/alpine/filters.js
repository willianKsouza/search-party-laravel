export default () => ({
    searchParams: new URLSearchParams(window.location.search),
    search: "",
    init() {
        this.search = this.searchParams.get("search");
    },
    searchByTitle() {
        this.searchParams.delete("page");

        if (this.search === "" || this.search === null) {
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
        
        this.searchParams.delete("page");

        const newParams = this.searchParams.get("category")?.split(",") ?? [];

        if (!newParams.includes(slug)) {
            newParams.push(slug);

            this.searchParams.set("category", newParams.toString());

            this.updateOrClearUrl(this.searchParams.toString());
            return;
        }

        const filterQuerys = newParams.filter((query) => {
            return query != slug
        })
        
        this.searchParams.set("category", filterQuerys.toString());
        
        this.updateOrClearUrl(this.searchParams.toString());
    },
    removeCategoryFilter(slug) {
        const filterCategory = this.searchParams
            .get("category")
            .split(",")
            .filter((e) => e != slug);
        const newParams = filterCategory.toString()
        this.searchParams.set("category", newParams.toString());
        this.updateOrClearUrl(this.searchParams.toString());
    },
    updateOrClearUrl(query) {
        const newUrl = `${window.location.pathname}?${query}`;
        window.location.href = newUrl;
    },
});
