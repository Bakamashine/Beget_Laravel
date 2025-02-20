const size = document.getElementById("size");
const plus = document.getElementById("count_plus");
const minus = document.getElementById("count_minus");

// if (size.value != "10") {
//     size.value = "10";
// }

function getValue() {
    return size.value;
}

var count = 10;

plus.addEventListener("click", () => {
    count++;
    size.value = count;
})

minus.addEventListener("click", () => {
    if (count == 10) {
        return;
    } else {
        count--;
        size.value = count;
    }
})

size.addEventListener("input", () => {
    count = getValue();
});
