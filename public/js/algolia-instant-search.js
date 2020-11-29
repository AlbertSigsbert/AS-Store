(function() {

    const search = instantsearch({
        appId: 'BIY8DSVIHI',
        apiKey: 'f80e71552836cad2b5304a52851d2f76',
        indexName: 'products',
        urlSync: true
    });

 search.addWidgets([
    instantsearch.widgets.hits({
        container: '#hits',
        templates: {
            empty: 'No results',
            item:   function(item)
                    {
            return `
            <a href="${window.location.origin}/shop/${item.slug}">
                    <div class="instant-search-result">
                        <div>
                          <img src="${window.location.origin}/storage/${item.image}" alt="img" class="algolia-thumb-result">
                        </div>

                        <div>

                            <div class ="result-title">
                                ${item._highlightResult.name.value}
                            </div>

                            <div class ="result-details">
                            ${item._highlightResult.details.value}
                            </div>

                            <div class ="result-price">
                            $${(item.price).toFixed(2)}
                            </div>

                        </div>

                    </div>
                </a>
                <hr>
            `;
          }

            //'<em>Hit {{objectID}}</em>: {{{_highlightResult.name.value}}}'
        },
     })

]);

    // initialize SearchBox
    search.addWidget(
        instantsearch.widgets.searchBox({
        container: '#search-box',
        placeholder: 'Search for products'
        })
    );

    // initialize stats
    search.addWidget( instantsearch.widgets.stats({container:'#stats-container'}));

// initialize RefinementList
   search.addWidget(
    instantsearch.widgets.refinementList({
      container: '#refinement-list',
      attributeName: 'categories'
    })
  );

  // initialize pagination
  search.addWidget(
    instantsearch.widgets.pagination({
      container: '#pagination',
      maxPages: 20,
      // default is to scroll to 'body', here we disable this behavior
      scrollTo: false
    })
  );

      search.start();

})();
