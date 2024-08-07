(async () => {

    section = document.getElementById("listings-container");
    queryString = window.location.search || '?';
    URL = '/API/properties/search.php' + queryString;

    cursor = 0;

    const options = {
        root: null,
        threshold: 0.1
    };

    const observer = new IntersectionObserver(callback, options);
    observer.observe(document.getElementById('scroller'));

})()

async function callback() {

    const listings = await fet();
    listings.forEach(property => {
        render(
            property['id'],
            property['image_path'],
            property['description'],
            property['address'],
            property['postcode'],
            property['rental_price']
        );
    });

}

async function fet() {

    // cursor=Number(cursor);
    if (isNaN(cursor) || (cursor === null)) { 
        console.log("killed nan")
        return[];
    }

    const response = await fetch(URL + `&cursor=${cursor}`);
    const json = await response.json();
    console.log('------------------')
    console.log(cursor);
    cursor = json['cursor'];

    return json['listings'];

}

function render(id, image, description, address, postcode, rent) {

    var anchor = document.createElement("a");
    anchor.href = `/property-viewer.php?id=${id}`;
    anchor.target='_blank';
    
    var innerhtml = `
        <div class="property">
            <div class="lease-image">
                <img loading="lazy" src="/images/${image}" alt="property">
            </div>
            <div class="lease-info">
                <h3>${description}</h3>
                <p>${address} ${postcode}</p>
                <p>£${rent}/month</p>
            </div>
        </div>
    `;

    anchor.innerHTML = innerhtml;
    section.appendChild(anchor)
}