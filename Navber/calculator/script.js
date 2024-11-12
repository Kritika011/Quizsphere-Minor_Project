let calculator = document.getElementById("calculator");
let display = document.getElementById("display");

function openCalculator() {
    calculator.style.display = "block";
}

function closeCalculator() {
    calculator.style.display = "none";
}

function appendToDisplay(value) {
    display.value += value;
}

function calculate() {
    try {
        display.value = eval(display.value);
    } catch {
        display.value = "Error";
    }
}

function clearDisplay() {
    display.value = "";
}

function calculateSquareRoot() {
    display.value = Math.sqrt(parseFloat(display.value));
}

function calculateSin() {
    display.value = Math.sin(parseFloat(display.value));
}

function calculateCos() {
    display.value = Math.cos(parseFloat(display.value));
}

function calculateTan() {
    display.value = Math.tan(parseFloat(display.value));
}

function calculateLog() {
    display.value = Math.log10(parseFloat(display.value));
}

function calculateExp() {
    display.value = Math.exp(parseFloat(display.value));
}

// Dragging functionality
calculator.addEventListener("mousedown", function(event) {
    let shiftX = event.clientX - calculator.getBoundingClientRect().left;
    let shiftY = event.clientY - calculator.getBoundingClientRect().top;

    function moveAt(pageX, pageY) {
        calculator.style.left = pageX - shiftX + "px";
        calculator.style.top = pageY - shiftY + "px";
    }

    function onMouseMove(event) {
        moveAt(event.pageX, event.pageY);
    }

    document.addEventListener("mousemove", onMouseMove);

    calculator.onmouseup = function() {
        document.removeEventListener("mousemove", onMouseMove);
        calculator.onmouseup = null;
    };
});

calculator.ondragstart = function() {
    return false;
};