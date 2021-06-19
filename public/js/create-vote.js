const btnAddOption = document.getElementById("btn-add-option");
btnAddOption.addEventListener("click", () => {
    const listOptions = document.getElementById("list-options");

    const newOption = document.createElement("li");
    newOption.classList.add("option");

    const options = document.getElementsByClassName("option");
    const nextValue = parseInt(options[options.length - 1].firstElementChild.getAttribute("name").split("_")[1]) + 1;

    const newInput = document.createElement("input");
    newInput.setAttribute("type", "text");
    newInput.setAttribute("name", "option_" + nextValue);
    newInput.setAttribute("value", "Option " + nextValue);

    newOption.appendChild(newInput);
    listOptions.appendChild(newOption);
});