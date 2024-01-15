require("./bootstrap");

Echo.channel("messages").listen("ServerCreated", (event) => {
    Object.keys(event.messages).forEach((stat) => {
        window.messages[stat] = event.messages[stat];
    });
});
