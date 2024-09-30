import Alpine from "alpinejs";
import collapse from "@alpinejs/collapse";

Alpine.prefix("xjcore-");
Alpine.plugin(collapse);

// Don't assign Alpine to the window (keep it private):
Alpine.start();

jQuery(document).ready(function () {
  // Add classes to the first item on load.
  const firstQuestion = jQuery(
    ".schema-faq-section .schema-faq-question",
  ).first();
  firstQuestion.addClass("faq-q-open");
  firstQuestion
    .siblings(".schema-faq-answer")
    .addClass("faq-a-open")
    .slideDown();

  // Set up click event handler for FAQ questions
  jQuery(".schema-faq-section .schema-faq-question").click(function () {
    const isVisible = jQuery(this)
      .siblings(".schema-faq-answer")
      .is(":visible");

    // Collapse all items
    jQuery(".schema-faq-question").removeClass("faq-q-open");
    jQuery(".schema-faq-answer").removeClass("faq-a-open").slideUp();

    // If the clicked item was not already visible, expand it
    if (!isVisible) {
      jQuery(this).addClass("faq-q-open");
      jQuery(this)
        .siblings(".schema-faq-answer")
        .addClass("faq-a-open")
        .slideDown();
    }
  });
});
