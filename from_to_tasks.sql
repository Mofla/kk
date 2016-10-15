CREATE TABLE from_to_tasks (
  id INT NOT NULL AUTO_INCREMENT,
  project_id INT NOT NULL,
  from_id INT NOT NULL,
  to_id INT NOT NULL,
  PRIMARY KEY (id)
);