print("Wallet Customization")

docker_build(
    "velmie/wallet-customization-db-migration",
    ".",
    dockerfile = "Dockerfile.migrations",
    only = "migrations",
)
k8s_resource(
    "wallet-customization-db-migration",
    trigger_mode = TRIGGER_MODE_MANUAL,
    resource_deps = ["wallet-customization-db-init"],
)

wallet_customization_options = dict(
    entrypoint = "sh /entrypoint.sh",
    dockerfile = "Dockerfile",
    port_forwards = [],
    helm_set = [],
)

docker_build(
    "velmie/wallet-customization",
    ".",
    dockerfile = wallet_customization_options["dockerfile"],
    entrypoint = wallet_customization_options["entrypoint"],
    only = [
        "./.provision",
        "./app",
        "./bootstrap",
        "./routes",
        "./config",
        "./public",
        "./public_rpc",
        "./database",
        "./resources",
        "./composer.json",
        "./artisan",
        "./rpc"
    ],
    live_update = [
        sync("./app", "/app/app"),
        sync("./bootstrap", "/app/bootstrap"),
        sync("./routes", "/app/routes"),
        sync("./config", "/app/config"),
        sync("./public", "/app/public"),
    ],
)
k8s_resource(
    "wallet-customization",
    resource_deps = ["wallet-customization-db-migration"],
    port_forwards = wallet_customization_options["port_forwards"],
)

yaml = helm(
    "./helm/wallet-customization",
    # The release name, equivalent to helm --name
    name = "wallet-customization",
    # The values file to substitute into the chart.
    values = ["./helm/values-dev.yaml"],
    set = wallet_customization_options["helm_set"],
)

k8s_yaml(yaml)
