module.exports = (app) => {
  const budgetings = require("../controllers/budgeting.controller.js");

  var router = require("express").Router();

  // Create a new budgeting
  router.post("/", budgetings.create);

  app.use("/api/budgetings", router);
};
