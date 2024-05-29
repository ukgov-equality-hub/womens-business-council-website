wget \
    --recursive \
    --level=inf \
    --page-requisites \
    --adjust-extension \
    --convert-links \
    --restrict-file-names=windows \
    --domains=localhost \
    --directory-prefix=offline-copy-of-website \
    http://localhost:8080/
