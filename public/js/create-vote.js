// Add a option
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
    
    const removeOption = document.createElement("span");
    removeOption.setAttribute("id", "remove-" + nextValue);
    removeOption.innerHTML = "&#x2715;";

    newOption.appendChild(newInput);
    newOption.appendChild(removeOption);
    listOptions.appendChild(newOption);

    // Remove a option
    for (let i = 1; i <= listOptions.children.length; i++) {
        document.getElementById("remove-" + i).addEventListener("click", (event) => {
            event.target.parentElement.remove();
        });
    }
});