def rover_battery_status():
    '''STEP1 - Enter code here to update key:value pairs.
       hard code or get user input to change the
       value for the following:
         "status": "unknown"
         "value": None
       This will mean you are creating some variables
       like, battery_status = ? and battery_value = ?
       and relpacing the hardcoded string "unknown" and None
    '''
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
    ''' STEP 2 - Update your code to extract and print the actual
        values that are returned.  The expected output should be
        something like:
        "Battery sensor status = Good, with a reading of 11.2 Volts"
        where "Battery" is the key for the returend sensor and "Good" is the value of the key 'status' and "11.2" is the
        value of 'value' and "Volts" is the value of the key 'unit'
    '''
    print(rover_sensor_status())

if __name__ == "__main__":
    main()

