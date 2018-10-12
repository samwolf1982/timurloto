// jQuery(document).ready(function ($) {
//     // REMOVE AND ADD CLICK EVENT
//     $('.doAddItem').on('click', function () {
//         $(".gridder").data('gridderExpander').gridderAddItem('TEST');
//     });
//     // Call Gridder
//     $(".gridder").gridderExpander({
//         scrollOffset: -20,
//         scrollTo: "listitem", // "panel" or "listitem"
//         animationSpeed: 400,
//         nextText: "",
//         prevText: "",
//         closeText: "",
//         animationEasing: "easeInOutExpo",
//         onStart: function () {
//             console.log("Gridder Inititialized");
//         },
//         onExpanded: function (object) {
//             console.log("Gridder Expanded");
//         },
//         onChanged: function (object) {
//             console.log("Gridder Changed");
//         },
//         onClosed: function () {
//             console.log("Gridder Closed");
//         },
//         // onStart: function () {
//         //     console.log("Gridder onStart");
//         // }
//
//     });
// });