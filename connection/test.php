<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiple Values in Array</title>
</head>
<body>

<script>
    // Create an empty array
    var selectedValues = [];

    // Function to add a value to the array
    function addValue() {
        // Get the selected value from an input field (you can adapt this based on your application)
        var inputValue = document.getElementById("inputField").value;

        // Check if the value is not empty
        if (inputValue.trim() !== "") {
            // Add the value to the array
            selectedValues.push(inputValue);

            // Clear the input field for the next input
            document.getElementById("inputField").value = "";

            // Display the updated array
            displayArray();
        } else {
            alert("Please enter a value.");
        }
    }

    // Function to display the array
    function displayArray() {
        // Display the array in the console (you can adapt this based on your application)
        console.log("Selected Values:", selectedValues);

        // You can also display the array in the HTML document if needed
        var outputDiv = document.getElementById("outputDiv");
        outputDiv.textContent = "Selected Values: " + selectedValues.join(", ");
    }
</script>

<!-- Example Input Field and Button -->
<input type="text" id="inputField" placeholder="Enter a value">
<button onclick="addValue()">Add Value</button>

<!-- Display Output -->
<div id="outputDiv"></div>

</body>
</html>
