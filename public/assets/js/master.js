function updateUrlWithFilteredParams() {
    // Extract query parameters from the current URL
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const params = {};

    urlParams.forEach((value, key) => {
        params[key] = value;
    });

    // Filter out null and empty values
    const filteredParams = Object.keys(params).reduce((acc, key) => {
        const value = params[key];
        if (value !== null && value !== '') {
            acc[key] = value;
        }
        return acc;
    }, {});

    // Build query string
    const queryStringFiltered = new URLSearchParams(filteredParams).toString();

    // Get the current URL without the query string
    const currentUrl = window.location.href.split('?')[0];

    // Construct the new URL with filtered query parameters
    const newUrl = queryStringFiltered ? `${currentUrl}?${queryStringFiltered}` : currentUrl;

    // Update the browser's URL
    window.history.pushState({}, '', newUrl);
}
$(document).ready(function () {
    window.updateUrlWithFilteredParams();


});
