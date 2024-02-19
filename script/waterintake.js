var counter = 0;

document.getElementById("increment-button").addEventListener("click", function() {
    counter++;
    document.getElementById("counter-value").innerHTML = counter;
});

// const incrementButton = document.getElementById('increment-button');
//     const counterValueInput = document.getElementById('counter-value');

//     // Add click event listener to the increment button
//     incrementButton.addEventListener('click', function() {
//         // Get the current value of the counter input
//         let currentValue = parseInt(counterValueInput.value);

//         // Increment the counter value by 1
//         currentValue++;

//         // Update the value of the counter input
//         counterValueInput.value = currentValue;
// });