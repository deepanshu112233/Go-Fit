var counter1 = 0;
document.getElementById("increment-button").addEventListener("click", function() {
    counter1++;
    document.getElementById("counter-value").innerHTML = counter1;
});