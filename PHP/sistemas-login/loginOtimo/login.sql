CREATE TABLE roles (
  id int NOT NULL,
  role varchar(255) NOT NULL
);

CREATE TABLE users (
  id int NOT NULL,
  fname varchar(255) DEFAULT NULL,
  lname varchar(255) DEFAULT NULL,
  email varchar(255) NOT NULL,
  wrong_logins int NOT NULL DEFAULT '0',
  password varchar(255) NOT NULL,
  user_role int NOT NULL DEFAULT '1',
  confirmed tinyint(1) NOT NULL DEFAULT '0',
  confirm_code varchar(255) DEFAULT NULL
);

-- Indexes for table roles
--
ALTER TABLE roles
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY role (role);

--
-- Indexes for table users
--
ALTER TABLE users
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY email (email);
-- AUTO_INCREMENT for table roles
--
ALTER TABLE roles
  MODIFY id int NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table users
--
ALTER TABLE users
  MODIFY id int NOT NULL AUTO_INCREMENT;
