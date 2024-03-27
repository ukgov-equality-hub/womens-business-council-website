
// An S3 bucket to store the static website
resource "aws_s3_bucket" "static_website_s3_bucket" {
  bucket_prefix = lower("${var.service_name_hyphens}--${var.environment_hyphens}--static-")
}

resource "aws_s3_bucket_public_access_block" "static_website_s3_bucket_public_access_block" {
  bucket = aws_s3_bucket.static_website_s3_bucket.id

  block_public_acls       = true
  block_public_policy     = true
  ignore_public_acls      = true
  restrict_public_buckets = true
}
