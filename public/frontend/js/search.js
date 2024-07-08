import algoliasearch from 'algoliasearch/lite';

const client = algoliasearch(import.meta.env.ALGOLIA_APP_ID, import.meta.env.ALGOLIA_SECRET);

window.searchConfig = () => {
    return {
        quotes: {
            total: 0,
            formattedTotal: function () {
                return `${this.total} ${this.total === 1 ? 'Result' : 'Results'}`;
            },
            quotes: [],
        },
        persons: {
            total: 0,
            formattedTotal: function () {
                return `${this.total} ${this.total === 1 ? 'Result' : 'Results'}`;
            },
            persons: [],
        },
        toggle() {
            this.searchQuery = '';
            this.lockScroll = this.searchVisible;

            if (this.searchVisible) this.$nextTick(() => this.$refs.search.focus());
        },
        search: async function () {
            // If the input is empty, return no results.
            if (this.searchQuery.length === 0) {
                return Promise.resolve({ hits: [] });
            }

            // Perform the search using the provided input.
            const { results } = await client.multipleQueries([
                {
                    indexName: import.meta.env.ALGOLIA_QUOTES_INDEX,
                    query: this.searchQuery,
                    params: {
                        hitsPerPage: 5,
                        attributesToSnippet: ['body:10'],
                    },
                },
                {
                    indexName: import.meta.env.ALGOLIA_PERSONS_INDEX,
                    query: this.searchQuery,
                    params: {
                        hitsPerPage: 5,
                        attributesToSnippet: ['body:10'],
                    },
                },
            ]);

            this.quotes.total = results[0].nbHits;
            this.quotes.quotes = results[0].hits;
            this.persons.total = results[1].nbHits;
            this.persons.persons = results[1].hits;
        },
    };
};
