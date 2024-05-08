
// Get the input element
var input = document.getElementById("guest-count");

// Add an event listener to listen for input changes
input.addEventListener("input", function () {
    // Get the value entered by the user
    var value = parseInt(input.value);

    // Check if the value is negative
    if (value < 0) {
        // If it's negative, set the input value to 0
        input.value = 0;
    }
});
