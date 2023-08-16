document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.querySelector('.search-city');
    const suggestionsContainer = document.querySelector('#suggestions');
    
    const cities = [
        { name: "Udaipur", url: "udaipur.html" },
        { name: "Jodhpur", url: "jodhpur.html" },
        { name: "Jaipur", url: "jaipur.html" },
        { name: "North Goa", url: "north goa.html" },
        { name: "South Goa", url: "south goa.html" },
        { name: "Allepy", url: "allepy.html" },
        { name: "Agra", url: "agra.html" },

        { name: "Bangalore", url: "bangalore.html" },
        { name: "Tanjavore", url: "brihadeswara.html" },
        { name: "Chennai", url: "chennai.html" },
        { name: "Coiambatore", url: "coaimbatore.html" },
        { name: "Delhi", url: "delhi.html" },
        { name: "Hyderabad", url: "hyderabad.html" },
        { name: "Kochi", url: "kochi.html" },
        { name: "Madurai", url: "madurai.html" },
        { name: "Manali", url: "manali.html" },
        { name: "Mumbai", url: "mumbai.html" },
        { name: "Rishikesh", url: "rishikesh.html" },
        { name: "Goa", url: "friends trip.html" },

    
    ];

    searchInput.addEventListener('input', () => {
        const inputValue = searchInput.value.toLowerCase();
        const filteredCities = cities.filter(city => city.name.toLowerCase().includes(inputValue));
        
        suggestionsContainer.innerHTML = '';

        if (filteredCities.length > 0) {
            filteredCities.forEach(city => {
                const suggestion = document.createElement('div');
                suggestion.classList.add('suggestion');
                suggestion.textContent = city.name;
                suggestion.addEventListener('click', () => {
                    window.location.href = city.url;
                });
                suggestionsContainer.appendChild(suggestion);
            });
        }
    });

    document.addEventListener('click', (event) => {
        if (!event.target.closest('.nav-search')) {
            suggestionsContainer.innerHTML = '';
        }
    });
});