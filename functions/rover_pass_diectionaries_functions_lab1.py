def rover_battery_status():
    return {
        "name": "battery",
        "status": "unknown",
        "value": None,
        "unit": "Volts",
    }

def rover_sensor_status():
    return {
        "battery": rover_battery_status(),
    }

def main():
    print(rover_sensor_status())


if __name__ == "__main__":
    main()
