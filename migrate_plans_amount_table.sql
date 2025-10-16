-- Migration script to update plans_amount table for dynamic plan rendering
-- Run this in your MariaDB/MySQL client

ALTER TABLE plans_amount 
  ADD COLUMN name VARCHAR(50) AFTER id,
  ADD COLUMN amount VARCHAR(20) AFTER name,
  ADD COLUMN description TEXT AFTER amount;

-- Example: Insert plans with new structure
INSERT INTO plans_amount (name, amount, description) VALUES
  ('Free Trial', 'Free / 14 days', 'Try all features at no cost'),
  ('Basic', 'N5,000/month', 'Ideal for small businesses'),
  ('Standard', 'N10,000/month', 'Perfect for growing businesses'),
  ('Premium', 'N20,000/month', 'Best for established businesses');

-- You can remove old columns after verifying migration
-- ALTER TABLE plans_amount DROP COLUMN Basic, DROP COLUMN 5000, ... etc;
