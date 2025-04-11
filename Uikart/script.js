document.addEventListener("DOMContentLoaded", function () {
    console.log("✅ JavaScript Loaded!");

    // Get buttons
    const signUpButton = document.getElementById("SignUpButton");
    const signInButton = document.getElementById("SignInButton");

    // Get form containers
    const signInForm = document.getElementById("signIn");
    const signUpForm = document.getElementById("signUp");

    // Debugging logs
    console.log("🔍 SignUpButton:", signUpButton);
    console.log("🔍 SignInButton:", signInButton);
    console.log("🔍 SignInForm:", signInForm);
    console.log("🔍 SignUpForm:", signUpForm);

    // Check if elements exist
    if (!signUpButton || !signInButton || !signInForm || !signUpForm) {
        console.error("❌ One or more elements are missing!");
        return;
    }

    // Detect URL parameters
    const urlParams = new URLSearchParams(window.location.search);
    const showSignUp = urlParams.get("signup");

    // Show correct form based on URL or default to Sign In
    if (showSignUp === "true") {
        console.log("🔄 Showing Sign Up Form (via URL parameter)");
        signInForm.style.display = "none";
        signUpForm.style.display = "block";
    } else {
        console.log("🔄 Showing Sign In Form (default)");
        signInForm.style.display = "block";
        signUpForm.style.display = "none";
    }

    // Add event listeners
    signUpButton.addEventListener("click", function () {
        console.log("🔄 Switching to Sign Up");
        signInForm.style.display = "none";
        signUpForm.style.display = "block";
    });

    signInButton.addEventListener("click", function () {
        console.log("🔄 Switching to Sign In");
        signInForm.style.display = "block";
        signUpForm.style.display = "none";
    });
});
function downloadFile(filename) {
    const link = document.createElement("a");
    link.href = `download.php?file=${filename}`;
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

function searchTemplate() {
    const searchInput = document.getElementById("searchInput");
    const input = searchInput.value.trim().toLowerCase();
    const allTemplates = document.querySelectorAll('.template-card');
    let found = false;

    // Reset previously highlighted cards
    allTemplates.forEach(card => {
        card.classList.remove('highlighted');
    });

    allTemplates.forEach(card => {
        const title = card.querySelector('.template-info h3').textContent.toLowerCase();

        if (title.includes(input) && input !== "") {
            // Scroll and highlight
            card.scrollIntoView({ behavior: 'smooth', block: 'center' });
            card.classList.add('highlighted');

            setTimeout(() => {
                card.classList.remove('highlighted');
            }, 2000);

            found = true;
        }
    });

    // Clear search bar if matches are found
    if (found) {
        searchInput.value = "";
        document.getElementById("suggestions").style.display = "none";
    } else if (input !== "") {
        alert("No matching template found. Try refining your search.");
    }
}

function liveSearch() {
    const input = document.getElementById('searchInput').value.trim().toLowerCase();
    const suggestionBox = document.getElementById('suggestions');
    suggestionBox.innerHTML = "";

    if (!input) {
        suggestionBox.style.display = "none";
        return;
    }

    const matches = Array.from(document.querySelectorAll('.template-card')).filter(card => {
        const title = card.querySelector('.template-info h3').textContent.toLowerCase();
        return title.includes(input);
    });

    if (matches.length > 0) {
        suggestionBox.style.display = "block";
        matches.forEach(match => {
            const title = match.querySelector('.template-info h3').textContent;
            const suggestionItem = document.createElement("div");
            suggestionItem.className = "suggestion-item";
            suggestionItem.textContent = title;
            suggestionItem.onclick = () => {
                match.scrollIntoView({ behavior: 'smooth', block: 'center' });
                match.classList.add('highlighted');
                setTimeout(() => match.classList.remove('highlighted'), 2000);
                suggestionBox.style.display = "none";
                document.getElementById('searchInput').value = ""; // Clear the search input
            };
            suggestionBox.appendChild(suggestionItem);
        });
    } else {
        suggestionBox.innerHTML = "<div class='suggestion-item no-match'>No results found</div>";
        suggestionBox.style.display = "block";
    }
}

document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchInput");

    searchInput.addEventListener("keydown", function (event) {
        if (event.key === "Enter") {
            event.preventDefault(); // Prevents form submission if inside a form
            searchTemplate();       // Call the search function
            // Note: The search function now handles clearing the input
        }
    });
});


