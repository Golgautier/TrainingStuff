kubectl create ns helm-test

helm install myapp -n helm-test  .

helm list -A

helm install myapp -n helm-test --dry-run

helm upgrade myapp -n helm-test -f ./lab_3-07_values.yaml

helm uninstall myapp -n helm-test