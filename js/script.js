// searchData javascript

let searchData = document.getElementById("searchData");
let searchDataButton = document.getElementById("searchDataButton");
let searchDataError = document.getElementById("searchDataError");

searchDataButton.addEventListener("click", () => {
    searchDataError.classList.add("error");
    if (searchData.value === "") {
        searchDataError.innerHTML = "No information was entered, please try again.";
    } else {
        searchDataError.classList.remove("error");
        searchDataError.innerHTML = "Results below:";
        // insert valid response implementation here
    }
});

// newProduct javascript

let newPID = document.getElementById("newPID");
let newName = document.getElementById("newName");
let newCost = document.getElementById("newCost");
let newProductButton = document.getElementById("newProductButton");
let newProductError = document.getElementById("newProductError");

newProductButton.addEventListener("click", () => {

    newProductError.classList.add("error");

    if ((newPID.value === "") || (newName.value === "") || (newCost.value === "")) {
        newProductError.innerHTML = "One or more fields are empty. Please try again.";
    } else if (!newPID.value.match(/^\d+$/)) {
        newProductError.innerHTML = "Product code can only contain numbers";
    } else if (!newName.value.match(/^[A-Z_]+$/)) {
        newProductError.innerHTML = "Product name can only be capitalized and have underscores.";
    } else {
        newProductError.classList.remove("error");
        newProductError.innerHTML = "Product added to database.";
    }
});

// changeProduct javascript

let changePID = document.getElementById("changePID");
let changeName = document.getElementById("changeName");
let changeCost = document.getElementById("changeCost");
let productButtons = document.querySelectorAll(".productButton");
let changeProductError = document.getElementById("changeProductError");

productButtons.forEach((btn) => btn.addEventListener("click", () => {

    changeProductError.classList.add("error");

    if ((changePID.value === "") || (changeName.value === "") || (changeCost.value === "")) {
        changeProductError.innerHTML = "One or more fields are empty. Please try again.";
    } else if (!changePID.value.match(/^\d+$/)) {
        changeProductError.innerHTML = "Product code can only contain numbers";
    } else if (!changeName.value.match(/^[A-Z_]+$/)) {
        changeProductError.innerHTML = "Product name can only be capitalized and have underscores.";
    } else {
        changeProductError.classList.remove("error");

        if (btn.value === "update") {
            changeProductError.innerHTML = "Product updated.";
            // update implementation
        }

        if (btn.value === "delete") {
            changeProductError.innerHTML = "Product deleted.";
            // delete implementation
        }
    }
}));

// menu javascript

let menuButton = document.getElementById("orderByMenu");

menuButton.addEventListener("click", () => {

    let menuChoice = document.getElementById("menu").value;
    let radioInputs = document.getElementsByName("size_coffee");
    let val;

    radioInputs.forEach((ipt) => {
        if (ipt.checked)
            val = ipt.value; // can change according to PID
    });

    console.log(val);
    console.log(menuChoice);

    // add to order content

});

let orderPID = document.getElementById("orderPID");
let PIDButton = document.getElementById("orderByPID");
let PIDError = document.getElementById("PIDError");

PIDButton.addEventListener("click", () => {
    PIDError.innerHTML = "";

    if (orderPID.value === "") {
        PIDError.innerHTML = "No information was entered, please try again.";
    } else if (!orderPID.value.match(/^\d+$/)) {
        PIDError.innerHTML = "Product code can only contain numbers.";
    } else {
        console.log("hi");
        // insert valid response implementation here
    }
});

// receipt javascript

let receiptNo = document.getElementById("receipt");
let receiptButton = document.getElementById("receiptButton");
let receiptError = document.getElementById("receiptError");

receiptButton.addEventListener("click", () => {
    receiptError.innerHTML = "";

    if (receiptNo.value === "") {
        receiptError.innerHTML = "No information was entered, please try again.";
    } else if (!receiptNo.value.match(/^\d+$/)) {
        receiptError.innerHTML = "Product code can only contain numbers.";
    } else {
        console.log("hi");
        // insert valid response implementation here
    }
});