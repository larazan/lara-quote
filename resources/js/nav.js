window.navConfig = () => {
    return {
        searchVisible: false,
        searchQuery: '',

        // Show search modal
        showSearch: function (event) {
            // Abort if trying to open while the following elements are focused
            if (
                event instanceof KeyboardEvent &&
                (event.target.tagName === 'INPUT' || event.target.tagName === 'TEXTAREA')
            ) {
                return false;
            }

            this.searchVisible = true;
        },
    };
};
