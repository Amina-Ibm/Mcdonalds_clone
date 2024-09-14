// Get all the divs with class 's-sec3-card'
var divs = document.querySelectorAll('.s-sec3-card');

// Add click event listener to each div
divs.forEach(function(div) {
    div.addEventListener('click', function() {
        // Clear 'selected' class from all divs
        divs.forEach(function(otherDiv) {
            otherDiv.classList.remove('selected');
        });

        // Add 'selected' class to clicked div
        this.classList.add('selected');
    });
});