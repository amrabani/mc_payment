const db = require("../models");
const Budgeting = db.budgetings;

// Create and Save a new Tutorial
exports.create = (req, res) => {
  // Validate request
  if (!req.body.balance) {
    res.status(400).send({
      message: "Content can not be empty!",
    });
    return;
  }

  // Create a Tutorial
  const budgeting = {
    balance: req.body.balance,
    type: req.body.type,
    description: req.body.description,
    published: req.body.published ? req.body.published : false,
  };

  // Save Tutorial in the database
  Budgeting.create(budgeting)
    .then((data) => {
      res.send(data);
    })
    .catch((err) => {
      res.status(500).send({
        message:
          err.message || "Some error occurred while creating the Budgeting.",
      });
    });
};
